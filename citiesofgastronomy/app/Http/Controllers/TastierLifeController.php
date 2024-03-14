<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TastierLifeController extends Controller
{
    public function index()
    {
        $url = config('app.apiUrl').'home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $res = json_decode( $data, true);
        //Log::info("DAtta Result-- ::");

        $inputs = [];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
        //Log::info($inputs);
        $inputs["cityList"] = $res["cities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        return view('tastier_life.show',$inputs);
    } 

    public function tastier_life_search(Request $request)
    {

        $searchRecipe = '';
        $searchChef = '';
        $searchCAT = '';
        $section = $request->input("section");
        if($section == 'recipes'){$searchRecipe = $request->input("search_box_recipe");}
        if($section == 'chefs'){$searchChef = $request->input("search_box_chef");}
        if($section == 'cat'){$searchCAT = $request->input("search_box_cat");}

        $page = $request->input("page");

        if(!$page){ $page=1;};
        if(!$pageChef){ $pageChef=1;};

        $fields = array(
            'searchRecipe' => $searchRecipe,
            'searchChef' => $searchChef,
            'searchCAT' => $searchCAT,
            'page' => $page,
            'pageChef' => $pageChef,
        );

        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'tastierLife';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN TastierLife SEARCH List: Recipe - ".$searchRecipe." / Chef - ".$searchChef." / Cat - ".$searchCAT);
        Log::info($res);

        $inputs = [];      
        $inputs["search_box_recipe"] = $searchRecipe;
        $inputs["search_box_chef"] = $searchChef;
        $inputs["search_box_cat"] = $searchCAT;
        $inputs["page"] = $page;
        $inputs["pageChef"] = $pageChef;
        $inputs["section"] = $section;
        
        $inputs["tot"] = $res["tot"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["totChefs"] = $res["totCHEF"];
        $inputs["paginatorChefs"] = $res["paginatorCHEF"];
        $inputs["recipes"] = $res["recipes"];
        $inputs["chefs"] = $res["chef"];
        $inputs["categories"] = $res["categories"];


        return view('admin.tastier_life',$inputs);
    }

    public function recipe_new()
    {
        $url = config('app.apiUrl').'recipe/create';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("NEW RECIPE :: RESPONSE");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = '';
        $inputs["chefsList"] = $res['Chef'];
        $inputs["categoriesList"] = $res['categories'];
        $inputs["citiesList"] = $res['Cities'];
        $inputs["selectedChef"] = 'default';
        $inputs["selectedCat"] = 'default';
        $inputs["selectedCity"] = 'default';
        $inputs["name"] = '';
        $inputs["photo"] = '';
        $inputs["description"] = '';
        $inputs["difficulty"] = '';
        $inputs["prepTime"] = '';
        $inputs["totalTime"] = '';
        $inputs["servings"] = '';
        $inputs["ingredients"] = '';
        $inputs["preparations"] = '';
        $inputs["isActive"] = '';
        $inputs["votes"] = '';
        $inputs["gallery"] = '';

        return view('tastier_life.new_recipe',$inputs);
    } 

    public function recipe_edit($id)
    {
        $url = config('app.apiUrl').'recipe/findRecipe/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("EDIT RECIPE :: RESPONSE");
        Log::info($res);

        $recipe = $res['Recipes'];

        $inputs = [];
        $inputs["id"] = $id;
        $inputs["chefsList"] = $res['Chef'];
        $inputs["categoriesList"] = $res['categories'];
        $inputs["citiesList"] = $res['Cities'];
        $inputs["selectedChef"] = $recipe['idChef']?$recipe['idChef']:'default';
        $inputs["selectedCity"] = $recipe['idCity']?$recipe['idCity']:'default';
        $inputs["selectedCat"] = $recipe['idCategory']?$recipe['idCategory']:'default';
        $inputs["name"] = $recipe['name'];
        $inputs["photo"] = $recipe['photo'];
        $inputs["description"] = $recipe['description'];
        $inputs["difficulty"] = $recipe['difficulty'];
        $inputs["prepTime"] = $recipe['prepTime'];
        $inputs["totalTime"] = $recipe['totalTime'];
        $inputs["servings"] = $recipe['servings'];
        $inputs["ingredients"] = $recipe['ingredients'];
        $inputs["preparations"] = $recipe['preparations'];
        $inputs["isActive"] = $recipe['active'];
        $inputs["votes"] = $recipe['vote'];
        $inputs["gallery"] = $res['Gallery'];

        return view('tastier_life.new_recipe',$inputs);    
    }


    public function recipe_save(Request $request){
        Log::info("----> RECIPE STORE..");
        $id = $request->input("id");
        $name = $request->input("data_name");
        $chef = $request->input("data_chef");
        $city = $request->input("data_city");
        $cat = $request->input("data_cat");
        $difficulty = $request->input("data_difficulty");
        $preptime = $request->input("data_preptime");
        $totaltime = $request->input("data_totaltime");
        $servings = $request->input("data_servings");
        $description = $request->input("data_description");
        $ingredients = $request->input("data_ingredients");
        $preparations = $request->input("data_preparations");

        $file =  $request->file('photo');
        $photo='';
        if($file){
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();
                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();
                    // This would be used for the payload
                    $file_path = $file->getPathName();
                    $photo = new \CURLFile($file_path);
        };


        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'photo' => $photo,
            'idChef' => $chef,
            'idCity' => $city,
            'idCategory' => $cat,
            'difficulty' => $difficulty,
            'prepTime' => $preptime,
            'totalTime' => $totaltime,
            'servings' => $servings,
            'description' => $description,
            'ingredients' => $ingredients,
            'preparations' => $preparations,
        ];

        ///////////////////////////////////////

        $cant_gallery =$request->input('cant_gallery');

        $dattaSend["cant_gallery"] = $cant_gallery;
        for($i = 1; $i < $cant_gallery;$i++){
            $id1 = 'image'.$i;
            $file =  $request->file($id1);
            $image='';
            if($file){
                //Log::info("Sr configura la imagen - ".$i);
                        // You can store this but should validate it to avoid conflicts
                        $original_name = $file->getClientOriginalName();

                        // You can store this but should validate it to avoid conflicts
                        $extension = $file->getClientOriginalExtension();

                        // This would be used for the payload
                        $file_path = $file->getPathName();

                        $image = new \CURLFile($file_path);
            };
            $dattaSend[$id1] = $image;
            $id1 = 'idImage'.$i;
            $idImage =  $request->input($id1);
            $dattaSend[$id1] = $idImage;
            $id1 = 'deleteImage'.$i;
            $deleteImage =  $request->input($id1);
            $dattaSend[$id1] = $deleteImage;
        };

        $url = config('app.apiUrl').'recipe/store';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //*/

        return $res;

    }

    public function chef_new()
    {
        $url = config('app.apiUrl').'generalDatta';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("NEW CHEF :: RESPONSE");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = '';
        $inputs["data_name"] = '';
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';

        return view('tastier_life.new_chef',$inputs);
    }     

    public function chef_edit($id)
    {
        $url = config('app.apiUrl').'chef/findChef/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res_dec = json_decode( $data, true);
        $res = $res_dec['chef'];
        Log::info("EDIT CHEF :: FIND");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = $id;
        $inputs["data_name"] = $res['name'];
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';
        foreach ($res['social_network'] as $social){
            if($social){
                switch($social['idSocialNetworkType']){
                    case 1:
                        $inputs["facebook_link"] = $social['social_network'];
                        break;
                    case 2:
                        $inputs["twitter_link"] = $social['social_network'];
                        break;
                    case 3:
                        $inputs["linkedin_link"] = $social['social_network'];
                        break;
                    case 4:
                        $inputs["instagram_link"] = $social['social_network'];
                        break;
                    case 5:
                        $inputs["tiktok_link"] = $social['social_network'];
                        break;
                    case 6:
                        $inputs["youtube_link"] = $social['social_network'];
                        break;
                }
            }
        }

        return view('tastier_life.new_chef',$inputs);
    } 
    
    public function chef_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("data_name");
        $facebook = $request->input("facebook_link");
        $twitter = $request->input("twitter_link");
        $linkedin = $request->input("linkedin_link");
        $instagram = $request->input("instagram_link");
        $tiktok = $request->input("tiktok_link");
        $youtube = $request->input("youtube_link");

        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'Facebok_link' => $facebook,
            'Twitter_link' => $twitter,
            'Linkedin_link' => $linkedin,
            'Instagram_link' => $instagram,
            'Tiktok_link' => $tiktok,
            'Youtube_link' => $youtube,
            'idSection' => 12 //indicates chefs on entity social_network
        ];

        $url = config('app.apiUrl').'chef/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CHEF STORE ::");
        //Log::info($res);
        return redirect( "admin/tastier_life?section=chefs&pageChef=1" );
    }

    public function chef_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'chef/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CHEF DELETE ::");
        Log::info($res);

        return $res;
    }
    

    public function category_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $dattaSend = [
            'id' => $id,
            'name' => $name
        ];

        $url = config('app.apiUrl').'categories/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CATEGORIES SAVE ::");
        Log::info($res);

        return $res;
    }

    public function category_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'categories/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CATEGORIES DELETE ::");
        //Log::info($res);

        return $res;
    }



}








