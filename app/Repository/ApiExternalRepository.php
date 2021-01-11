<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 11/01/21
 * Time: 0:07
 */

namespace App\Repository;

use App\Library\ApiExternal;
use App\Post;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ApiExternalRepository
{

    public function store()
    {
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $api = new ApiExternal($url);
        $data = $api->getJsonWithOutParameter();
        if(count($data) > 0)
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::table('post')->truncate();
            foreach ($data as $row)
                Post::create($row);
        }
    }

    public function listData()
    {
        $object = Post::paginate()->toArray();
        return DataTables::of($object['data'])
            ->with([
                "recordsTotal" => $object['total'],
                "recordsFiltered" => $object['per_page'],
                "current_page" => $object['current_page'],
                "first_page_url" => $object['first_page_url'],
                "from" => $object['from'],
                "last_page" => $object['last_page'],
                "last_page_url" => $object['last_page_url'],
                "next_page_url" => $object['next_page_url'],
                "path" => $object['path'],
                "per_page" => $object['per_page'],
                "prev_page_url"=> $object['prev_page_url'],
                "to" => $object['to'],
                "total" => $object['to']
            ])
             ->make(true);
    }
}