<?php

class SocialController extends BaseController {

	


public function join($post, $empresaid, $relationid)
	{
		$empresa = Empresa::find($empresaid);
		$social = SocialRelation::where('empresa_id', $empresaid)->first();
	
		if ($social == null){
			$social = 0;
		}else{
			$social = $social->id;
		}
		

		$Socialrelation = SocialRelation::findOrNew($social);        
            $Socialrelation->empresa_id = $relationid;
            $Socialrelation->empresa_id_related = $empresaid;
            $Socialrelation->save();

return Redirect::to('/'.$empresa->slug);
	
		}


		public function unjoin($post, $empresaid, $relationid)
	{
		$empresa = Empresa::find($empresaid);
		$social = SocialRelation::where('empresa_id', $relationid)->first();
		$Socialrelation = SocialRelation::find($social->id);        
        $Socialrelation->delete();


return Redirect::to('/'.$empresa->slug);
		}




	


}