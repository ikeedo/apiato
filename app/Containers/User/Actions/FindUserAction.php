<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Exceptions\UserNotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class FindUserAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\User\Exceptions\UserNotFoundException
     */
    public function run(Request $request)
    {
        $userId = $request->id;

        $user = Apiato::call('User@FindUserByIdTask', [$userId]);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

}
