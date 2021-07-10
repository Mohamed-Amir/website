@extends('Fronted.layouts.master')

@section('title')
    الاستبيان
    @endsection

@section('content')
    <div class="questionaier">
        <div>
            <img src="/Fronted/images/questionnaire.jpg">
        </div>
        <div class="container">
            <div class="questionaier_page">
                <div class="headerquestionaier">
                    <h1>الاستبيان </h1>
                </div>
                <div class="body_questionaier">
                    <div>
                        <p class="title">In which HTML tag do we put JavaScript code? </p>
                        <ul>
                            <li><input type="radio" name="tab1">html</li>
                            <li><input type="radio" name="tab1"> script</li>
                            <li><input type="radio" name="tab1"> h1</li>
                            <li><input type="radio" name="tab1"> link</li>
                        </ul>
                    </div>
                    <hr>
                    <div>
                        <p class="title">In which HTML tag do we put JavaScript code?</p>
                        <ul>
                            <li><input type="radio" name="tab1">html</li>
                            <li><input type="radio" name="tab1"> script</li>
                            <li><input type="radio" name="tab1"> h1</li>
                            <li><input type="radio" name="tab1"> link</li>
                        </ul>
                    </div>
                    <hr>
                    <div>
                        <p class="title">In which HTML tag do we put JavaScript code?</p>
                        <ul>
                            <li><input type="radio" name="tab1">html</li>
                            <li><input type="radio" name="tab1"> script</li>
                            <li><input type="radio" name="tab1"> h1</li>
                            <li><input type="radio" name="tab1"> link</li>
                        </ul>
                    </div>
                    <hr>
                    <div>
                        <p class="title">In which HTML tag do we put JavaScript code?</p>
                        <ul>
                            <li><input type="radio" name="tab1">html</li>
                            <li><input type="radio" name="tab1"> script</li>
                            <li><input type="radio" name="tab1"> h1</li>
                            <li><input type="radio" name="tab1"> link</li>
                        </ul>
                    </div><hr>
                    <div>
                        <p class="title">In which HTML tag do we put JavaScript code?</p>
                        <ul>
                            <li><input type="radio" name="tab1">html</li>
                            <li><input type="radio" name="tab1"> script</li>
                            <li><input type="radio" name="tab1"> h1</li>
                            <li><input type="radio" name="tab1"> link</li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="button" class="bg-transparent py-2 px-4 button " data-bs-toggle="modal" data-bs-target="#exampleModal">اظهار النتيجة</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="custom-modal">
                                        <div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div>
                                        <div class="content">
                                            <p class="type">Hi Ahmed, Your Score</p>
                                            <p class="message-type">0 Out of 5 questions were correct.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection