<?php

use Phalcon\Mvc\Controller;


class CrudController extends Controller
{
    public function indexAction()
    {
        die("working");
    }
    public function studentAction()
    {
        if ($this->request->isPost()) {
            $name = $this->request->getPost("name");
            $rollno = $this->request->getPost("rollno");
            $address = $this->request->getPost("address");
            $std = new Student();
            $std->name = $name;
            $std->rollno = $rollno;
            $std->address = $address;
            $std->save();
        }
    }

    public function deleteAction()
    {
        $st = new Student();
        // $st->id="6286308d93cf7bc4610b8bc3";
        // $st->name="Amit Yadav";
        // $st->rollno="123456789";
        // $st->address="Lucknow";
        // $st->update();

        $st->load();
        if ($this->request->isPost()) {
            $id = $this->request->getPost();
            $st = new Student();
            $st->id = $id;
            $st->delete();
        }
    }

    public function updateAction()
    {

    }
}
