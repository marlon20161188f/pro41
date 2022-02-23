<?php

   
    namespace Modules\Sale\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\ResourceCollection;
    use Modules\Sale\Models\Hilo;

    class HiloCollection extends ResourceCollection
    {
        /**
         * Transform the resource collection into an array.
         *
         * @param Request $request
         *
         * @return array
         */
        public function toArray($request)
        {
            return $this->collection->transform(function (Hilo $row, $key) {

                return [
                    'id' => $row->id,
                    'name' => $row->name,
                    'created_at' => ($row->created_at) ? $row->created_at->format('Y-m-d H:i:s') : null,
                    'updated_at' => ($row->updated_at) ? $row->updated_at->format('Y-m-d H:i:s') : null,
                ];
            });

        }

    }
