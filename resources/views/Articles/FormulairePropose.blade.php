@extends('../Template.layout')

@section('contenu')
<!--<div id="modal2" class="modal modal-fixed-footer">-->
    <div class="modal-content">
        <div class="row">
            <div class="col s12">
                <h4 class="josefin-bold">PROPOSER UN ARTICLE</h4>
                <p>Vous souhaitez soumettre un article pour une publication au sein de la revue ?
                    Rien de plus simple, enregistrez le sujet de votre article ainsi que votre nom
                    et joignez nous votre document au format WORD de préférence ou autre format éditable (.doc, .docx, .odt, .txt).
                    <br><br>
                    Au plaisir de vous lire.
                </p>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @else(Session::has('message'))
                <div class="alert alert-info">
                    {{Session::get('message')}}
                </div>
            @endif

            <form class="col s12" action="{{route ('ProposeArticle')}}" method="post">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'/>


                <div class="row">
                    <div class="input-field col s12">
                        <input id="job" type="text" name="titre" class="validate" value="{{ old('titre') }}">
                        <label for="job">Sujet de l'article</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="nom" class="validate" value="{{ old('nom') }}">
                        <label for="text">Nom de l'auteur</label>
                    </div>
                </div>
                <input type="submit" value="Je propose">
                <a href="{{route('demandePublier') }}" class="modal-action modal-close waves-effect waves-green btn-flat left">Retour</a>
            </form>
        </div>

    </div>

<!--</div>-->
@push('javascript')
<!--<script>

    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();

        $('.modal-close').click(function(){
            $('.modal').closeModal();
            $('.lean-overlay').css({display:'none'});
        });
    });

</script>-->
@endpush
@endsection
