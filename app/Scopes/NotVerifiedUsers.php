<?php

	namespace App\Scopes;
	use Illuminate\Database\Eloquent\Scope;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Builder;

	/** Global scope
    *  $user->withoutGlobalScopes()->get();
    *  $user->withoutGlobalScope(App\Scope\NotVerifiedUsers::class)->get();
	*/

	class NotVerifiedUsers implements Scope {
		public function apply(Builder $builder, Model $model) {
            return $builder->where('email_verified_at', '=', null);
		}
	}



?>