@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4 mt-2">
        <div class="col-md-10">
            <div class="card"> 
                <div class="card-body">
                    <h3 class="text-center font-weight-bold pt-2">Data Labelling for Emotion Detection</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <p>Arahan kepada pelajar:</p>
                    
                    <p>Pelajar dikehendaki untuk ke laman sesawang bagi membuat pengesahan data. <a href="{{ route('login') }}">Log masuk </a>laman tersebut menggunakan nombor matrik pelajar bersama kata laluan menggunakan gabungan nombor matrik pelajar bersama abjad xyz, seperti contoh:</p>
                    <p class="text-center">
                        Matric Number: 35782156
                    </p>
                    <p class="text-center">
                        Kata Laluan: 35782156xyz
                    </p>
                    <p>Pelajar dinasihatkan supaya mengesahkan mengikut halaman. Terima kasih kerana meluangkan masa anda untuk menjawab borang soal selidik ini.</p>
                    <hr>
                    <p>Instructions to Students:</p>
                    
                    <p>Students are required to go to the website to validate the data. <a href="{{ route('login') }}">Login </a>the page using the student matrix number with the password using the combination of the student matrix number with the xyz alphabet, as example:</p>
                    <p class="text-center">
                        Matric Number: 4184297D
                    </p>
                    <p class="text-center">
                        Password: 4184297Dxyz
                    </p>
                    <p>Students are advised to confirm by page. Thank you for taking the time to answer this survey.</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection