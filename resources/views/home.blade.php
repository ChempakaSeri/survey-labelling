@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Tahniah! Anda terpilih sebagai ahli pakar bagi mengesahkan data Tweet kami untuk kaji selidik yang bertajuk "Analis Emosi di dalam Rangkaian Sosial Media Twitter".
                        Kaji selidik ini bertujuan untuk mendapatkan pengesahan dari anda akan emosi pengguna Twitter bagi Tweet yang telah mereka "post" di Twitter.
                    </p>
                    <p> Terima kasih kerana meluangkan masa anda untuk menjawab borang soal selidik kami.</p>
                    <p>
                        Arahan: <br>
                        Borang kaji selidik ini mengandungi 250 Tweet yang perlu disahkan. Setiap halaman mempunyai 10 Tweet. Anda dinasihatkan untuk menjawab mengikut setiap halaman.
                        Semua ahli pakar perlu memilih satu jenis emosi yang sesuai untuk setiap tweet.
                    </p>

                    <hr/>
                    <p>
                        Congratulations! You are chosen as our expert for data validation review for our research entitled "Emotion Analysis in Twitter Social Network".
                        The objective of this research is to get the expert to validate the emotion of each posted tweets.
                    </p>
                    <p> Thank you for taking your time to complete this survey. </p>
                    <p>
                        Instruction: <br>
                        This survey form contain 250 Tweets that needs to be labelled. Each pages contain 10 Tweets.
                        You are advised to answer the surveys based on each pages.
                        All the experts are required to choose one correspond emotions for each tweet.
                    </p>


                    <div class="text-center">
                        <a role="button" class="btn btn-success" href="{{ route('survey') }}">Start Survey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
