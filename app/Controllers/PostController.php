<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function add()
    {
        $file = $this->request->getFile('file');
        $fileName = $file->getRandomName();

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'body' => $this->request->getPost('body'),
            'image' => $fileName,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'file' => 'uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]'
        ]); 

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors(),
            ]);
        } else {
            if (!is_dir('uploads/avatar')) {
                mkdir('uploads/avatar', 0777, true);
            }
            $file->move('uploads/avatar', $fileName);
            $postModel = new \App\Models\PostModel();
            $postModel->save($data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Successfully added new post!',
            ]);
        }
    }

    public function fetch(){
        $postModel = new \App\Models\PostModel();
        $posts = $postModel->findAll();
        
        $data = '';

        if(count($posts) > 0){
          foreach($posts as $post){
            $data .= '
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <a href="" id="'.$post['id'].'" data-bs-toggle="modal" data-bs-target="#detail_post_modal" class="post_detail_btn">
                            <img src="uploads/avatar/'.$post['image'].'"  alt="" class="img-fluid card-img-top">
                        </a> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title fs-5 fw-bold">'.$post['title'].'</div>
                                <div class="badge bg-dark">'.$post['category'].'</div>
                            </div>
                            <p>'.substr($post['body'], 0, 80).'...</p>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="fst-italic">'.date('d F Y', strtotime($post['created_at'])).'</div>
                                <div>
                                    <a href="" id="'.$post['id'].'" data-bs-toggle="modal" data-bs-target="#edit_post_modal" class="btn btn-success btn-sm post_edit_btn">Edit</a>
                                    <a href="" id="'.$post['id'].'" class="btn btn-danger btn-sm post_delete_btn ">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                ';
            }
            return $this->response->setJSON([
                'error' => false,
                'message' => $data,
            ]);
        }else{
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);

            return $this->response->setJSON([
                'error' => true,
                'message' => '<div class="text-secondary text-center fw-bold my-5">Not posts fonds in the database!</div>'
            ]);
        }
    }


    //Fonction edit
    public function edit($id = null){
        
        $postModel = new \App\Models\PostModel();
        $posts = $postModel->find($id);

        return $this->response->setJSON([
            'error'=> false,
            'message'=> $posts,
        ]);
    }

    //fonction update
    public function update(){
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('file');
        $fileName = $file->getFilename();

        if($fileName != ''){
            $fileName = $file->getRandomName();
            $file->move('uploads/avatar', $fileName);
            if($this->request->getPost('old_image') != ''){
               unlink('uploads/avatar/'.$this->request->getPost('old_image'));
            }else{
                return null;
            }
        }else{
            $fileName = $this->request->getPost('old_image');
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'body' => $this->request->getPost('body'),
            'image' => $fileName,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $postModel = new \App\Models\PostModel();
        $postModel->update($id, $data);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully added new post!',
        ]);
    }

    //Fonction delete
    public function delete($id = null)
    {
        $postModel = new \App\Models\PostModel();
        $posts = $postModel->find($id);
        $postModel->delete($id);
        unlink('uploads/avatar/' . $posts['image']);

        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully delete post!',
        ]);
    }

    //Foncton detail
    public function detail($id = null)
    {
        $postModel = new \App\Models\PostModel();
        $posts = $postModel->find($id);
        
        return $this->response->setJSON([
            'error' => false,
            'message' => $posts,
        ]);
    }
}
