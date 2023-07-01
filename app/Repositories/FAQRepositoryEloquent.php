<?php

namespace App\Repositories;

use App\Models\Models\FAQ;
use Illuminate\Support\Facades\Auth;

Class FAQRepositoryEloquent implements FAQRepository
{
    public function create($attributes)
    {
        $faq = new FAQ();
        $faq->question = $attributes['question'];
        $faq->answer = $attributes['answer'];
        $faq->save();
        return $faq;
    }

    public function get_by_id($id)
    {
        return FAQ::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editFaq= $this->get_by_id($id);

        $editFaq->question = $attributes['question'];
        $editFaq->answer = $attributes['answer'];
        $editFaq->save();
        return $editFaq;

    }
}
