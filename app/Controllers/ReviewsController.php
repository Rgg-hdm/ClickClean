<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviewModel = new ReviewModel();
        $data['reviews'] = $reviewModel->findAll();
        return view('review/index', $data);
    }

    public function create()
    {
        return view('review/create');
    }

    public function store()
    {
        $reviewModel = new ReviewModel();

        // Validasi input
        $validation = $this->validate([
            'order_id' => 'required|integer',
            'rating'   => 'required|integer|greater_than[0]|less_than[6]',
            'comment'  => 'permit_empty|string',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Simpan data review
        $reviewModel->save([
            'order_id' => $this->request->getPost('order_id'),
            'rating'   => $this->request->getPost('rating'),
            'comment'  => $this->request->getPost('comment'),
        ]);

        return redirect()->to('/reviews')->with('success', 'Review created successfully');
    }

    public function edit($id)
    {
        $reviewModel = new ReviewModel();
        $data['review'] = $reviewModel->find($id);

        if (empty($data['review'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Review not found');
        }

        return view('review/edit', $data);
    }

    public function update($id)
    {
        $reviewModel = new ReviewModel();

        // Validasi input
        $validation = $this->validate([
            'order_id' => 'required|integer',
            'rating'   => 'required|integer|greater_than[0]|less_than[6]',
            'comment'  => 'permit_empty|string',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Update data review
        $reviewModel->update($id, [
            'order_id' => $this->request->getPost('order_id'),
            'rating'   => $this->request->getPost('rating'),
            'comment'  => $this->request->getPost('comment'),
        ]);

        return redirect()->to('/reviews')->with('success', 'Review updated successfully');
    }

    public function delete($id)
    {
        $reviewModel = new ReviewModel();
        $reviewModel->delete($id);
        return redirect()->to('/reviews')->with('success', 'Review deleted successfully');
    }
}
