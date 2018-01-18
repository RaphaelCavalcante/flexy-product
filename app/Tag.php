<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $timestamps = false;
    public function products() {
        return $this->belongsToMany('App\Product');
    }
    static function mostUsed($allTags) {
        $tags = array();
        foreach($allTags as $tag){
            array_push ($tags, $tag);
        }
        $d = count($tags);
        $len = count($tags);
        while($d>1) {
            $d = ($d + 1)/2;
            for($i=0; $i<($len-$d);$i++){
                if($tags[$i+$d]->products->count() > $tags[$i]->products->count()){
                    $aux = $tags[$i+$d];
                    $tags[$i+$d] = $tags[$i];
                    $tags[$i] = $aux;
                }
            }
        }
        return $tags;
    }
}
