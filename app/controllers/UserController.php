<?php

use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    public function createAction()
    {
        // Create a new user
        $user = new User();
        $user->username = $this->request->getPost('username');
        $user->email = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');
        $user->create();

        // Return the new user as a JSON response
        $this->response->setContent(json_encode([
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ]));
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->send();
    }

    public function readAction($id)
    {
        // Find the user by ID
        $user = User::findFirst($id);

        // Return the user as a JSON response
        $this->response->setContent(json_encode([
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ]));
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->send();
    }

    public function updateAction($id)
    {
        // Find the user by ID
        $user = User::findFirst($id);
        if (!$user) {
            // User not found, return an error response
            $this->response->setStatusCode(404, 'Not Found');
            $this->response->setContent(json_encode([
                'error' => 'User not found',
            ]));
            $this->response->setContentType('application/json', 'UTF-8');
            $this->response->send();
            return;
        }

        // Update the user
        $user->username = $this->request->getPost('username');
        $user->email = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');
        $user->update();

        // Return the updated user as a JSON response
        $this->response->setContent(json_encode([
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ]));
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->send();
    }

    public function deleteAction($id)
    {
        // Find the user by ID
        $user = User::findFirst($id);
        if (!$user) {
            // User not found, return an error response
            $this->response->setStatusCode(404, 'Not Found');
            $this->response->setContent(json_encode([
                'error' => 'User not found',
            ]));
            $this->response->setContentType('application/json', 'UTF-8');
            $this->response->send();
            return;
        }

        // Delete the user
        $user->delete();

        // Return a success response
        $this->response->setStatusCode(200, 'OK');
        $this->response->setContent(json_encode([
            'success' => true,
        ]));
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->send();
    }

    public function listAction()
    {
        // Fetch the list of users
        $users = User::find();

        // Return the list of users as a JSON response
        $this->response->setContent(json_encode(array_map(function ($user) {
            return [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
            ];
        }, $users)));
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->send();
    }
}

?>

                
