<?php

namespace App;

use Prettus\Repository\Eloquent\course as Base;

abstract class course extends Base
{


    public function findBySlug($slug)
    {
        return $this->findByField('slug', $slug);
    }

    public function findBySlugOrId($id)
    {
        $result = $this->findBySlug($id)->first();

        if(!$result)
        {
            $result = $this->find($id);
        }

        return $result;
    }

    public function findBySlugOrIdOrFail($id)
    {
        $result = $this->findBySlugOrId($id);

        if(!$result)
        {
            return abort(404);
        }

        return  $result;
    }


}<?php

namespace App;

use Prettus\Repository\Eloquent\course as Base;

abstract class course extends Base
{


    public function findBySlug($slug)
    {
        return $this->findByField('slug', $slug);
    }

    public function findBySlugOrId($id)
    {
        $result = $this->findBySlug($id)->first();

        if(!$result)
        {
            $result = $this->find($id);
        }

        return $result;
    }

    public function findBySlugOrIdOrFail($id)
    {
        $result = $this->findBySlugOrId($id);

        if(!$result)
        {
            return abort(404);
        }

        return  $result;
    }


}