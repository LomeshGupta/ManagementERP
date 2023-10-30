<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserSetup;
use App\Models\ItemModel;


class MastersController extends Controller
{
    public function index()
    {
    }
    public function items()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $itemModel = new ItemModel();
        $data['all'] = $itemModel->findall();
        if ($data['user']['name']) {
            echo view('base/header', $data);
            echo view('items/itemlist', $data);
        } else {
            return redirect()->to(base_url('signin'));
        }
    }
    public function additem()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $itemModel = new ItemModel();
        $data['all'] = $itemModel->findall();
        if ($data['user']['name']) {
            echo view('base/header', $data);
            echo view('items/additem', $data);
        } else {
            return redirect()->to(base_url('signin'));
        }
    }
    public function storeitem()
    {
        $imageFile = $this->request->getFile('file');
        if (!empty($imageFile->guessExtension())) {
            $newName = $imageFile->getRandomName();
            $imageFile->move('../public/uploads', $newName);
        }
        $data = [
            'item_no' => $this->request->getVar('item_no'),
            'item_name'     => $this->request->getVar('item_name'),
            'unit_cost'    => $this->request->getVar('unit_cost'),
            'unit_price'  => $this->request->getVar('unit_price'),
            'image' =>  $newName,
            'type'  => $imageFile->getClientMimeType(),
            'inv_posting_group' => $this->request->getVar('inv_posting_group'),
            'uom'  => $this->request->getVar('uom'),
            'replenish_type' => $this->request->getVar('replenish_type'),
            'costing_method' => $this->request->getVar('costing_method'),
            'reorder_qty' => $this->request->getVar('reorder_qty')
        ];
        $itemModel = new ItemModel();
        $done = $itemModel->save($data);
        if ($done) {
            return redirect()->to(base_url('items'));
        }
    }
    public function edititem()
    {
        $id = $_POST['item_no'];
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $itemModel = new ItemModel();
        $data['items'] = $itemModel->where('item_no', $id)->find();
        if ($data['items'][0]['item_no']) {
            echo view('base/header.php', $data);
            echo view('items/edititem.php', $data);
        } else {
            return redirect()->to(base_url('signin'));
        }
    }
}
