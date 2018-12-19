@extends('spravovanie.index2')
@section('supercontent2')

    <div class="header">
        <h4 class="title">Zoznam používateľov</h4>
    </div>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Email</th>
            <th>Blokovaný</th>
            <th>Vyvorený</th>
            </thead>
            <tbody id="bodyTable">
            @foreach($pouzivatelia as $pouzivatel)
            <tr>
                <td>{{$pouzivatel->email}}</td>
                <td>{{$pouzivatel->blokovany}}</td>
                <td>{{$pouzivatel->created_at}}</td>
                <td>
                    <form action="{{action('AdminInzeratyController@index', $pouzivatel->id)}}" method="get" style="margin: 0;">
                        {{csrf_field()}}
                        <input type="hidden" name="pouzivatel_id" value="{{$pouzivatel->id}}"/>
                        <button style="border: none"  class="btn btn-info" type="submit"><i class="pe-7s-search"></i></button>
                    </form>
                </td>
                <td>
                    <button style="border: none" class="btn btn-info" data-toggle="modal" data-target="#delete" data-id="{{$pouzivatel -> id}}"><i class="pe-7s-trash"></i></button>
                </td>
                <td>
                    <button style="border: none" class="btn btn-info" data-toggle="modal" data-target="#block" data-id="{{$pouzivatel -> id}}"><i class="pe-7s-lock"></i></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{--<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog modal-lg" style="text-align: center">--}}
                {{--<div class="modal-content">--}}

                    {{--<!-- header modal -->--}}
                    {{--<div class="modal-header">--}}
                        {{--<button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" id="mySmallModalLabel">Naozaj chcete odstrániť tohto použivateľa?</h4>--}}
                    {{--</div>--}}

                    {{--<!-- body modal -->--}}
                    {{--<div class="modal-body text-center">--}}
                        {{--Jeho odstránením vymažete všetky jeho inzeráty.--}}
                        {{--<hr>--}}
                        {{--<form id="delForm" method="post">--}}
                            {{--{{csrf_field()}}--}}
                            {{--{{ method_field('DELETE') }}--}}
                            {{--<button type="submit" value="delete" class="btn btn-danger">Delete</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>

    <div style="text-align: center;">{{ $pouzivatelia->links() }}</div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // $("#bodyTable").children().each(function(index) {
            //     this.children[4].children[0].id = this.children[4].children[0].id + this.value;

                // this.children[4].children[0].addEventListener("click", function(){
                //     var stylesheet = document.styleSheets[1];
                //     stylesheet.disabled = true;
                // });
            // });

            // document.getElementById("myBtn").addEventListener("click", function(){
            //     var stylesheet = document.styleSheets[1];
            //     stylesheet.disabled = true;
            // });

            // document.getElementById("delForm").addEventListener("click", function(){
            //     var stylesheet = document.styleSheets[1];
            //     stylesheet.disabled = false;
            // });
            //
            // document.getElementById("closeBtn").addEventListener("click", function(){
            //     var stylesheet = document.styleSheets[1];
            //     stylesheet.disabled = false;
            // });

            $("#delete").on("show.bs.modal", function (e) {
                var ID = $(e.relatedTarget).data('id');

                // $("#delete").val( ID );
                $("#delForm").attr('action', '/pouzivatelia_a/' + ID);
            });

            $("#block").on("show.bs.modal", function (e) {
                var ID = $(e.relatedTarget).data('id');

                // $("#delete").val( ID );
                $("#blockForm").attr('action', '/blokPouzivatel/' + ID);
            });
        });
    </script>
@endsection