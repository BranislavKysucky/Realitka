@extends('spravovanie.index2')
@section('supercontent2')

    <div class="header">
        <h4 class="title">{{$pouzivatel->email}}</h4>
    </div>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Názov</th>
            <th>Vytvorený</th>
            </thead>
            <tbody id="bodyTable2">
                @foreach($inzeraty as $inzerat)
                <tr>
                    <td>{{$inzerat->nazov}}</td>
                    <td>{{$inzerat->created_at}}</td>
                    <td>
                        <a href="{{action('AdminInzeratyController@show', $inzerat->id)}}"><i class="pe-7s-search"></i></a>
                    </td>
                    <td>
                        <a href="{{action('AdminInzeratyController@edit', $inzerat->id)}}"><i class="pe-7s-edit"></i></a>
                    </td>
                    <td>
                        <button id="myBtn" value="{{$inzerat->id}}" style="border: none" class="btn btn-info" data-toggle="modal" data-target="#delete" data-id="{{$inzerat -> id}}" data-pouzivatel_id="{{$pouzivatel->id}}"><i class="pe-7s-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="delete" class="modal fade" class="modal-dialog modal-lg" style="background-color: red" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- header modal -->
                    <div class="modal-header">
                        <button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="mySmallModalLabel">Naozaj chcete odstrániť tohto použivateľa?</h4>
                    </div>

                    <!-- body modal -->
                    <div class="modal-body text-center">
                        Jeho odstránením vymažete všetky jeho inzeráty.
                        <hr>
                        <form id="delForm" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#bodyTable2").children().each(function(index) {
                    this.children[4].children[0].id = this.children[4].children[0].id + this.value;

                    this.children[4].children[0].addEventListener("click", function(){
                        var stylesheet = document.styleSheets[1];
                        stylesheet.disabled = true;
                    });
                });

                // document.getElementById("myBtn").addEventListener("click", function(){
                //     var stylesheet = document.styleSheets[1];
                //     stylesheet.disabled = true;
                // });

                document.getElementById("delForm").addEventListener("click", function(){
                    var stylesheet = document.styleSheets[1];
                    stylesheet.disabled = false;
                });

                document.getElementById("closeBtn").addEventListener("click", function(){
                    var stylesheet = document.styleSheets[1];
                    stylesheet.disabled = false;
                });

                $("#delete").on("show.bs.modal", function (e) {
                    var ID = $(e.relatedTarget).data('id');

                    $("#delForm").attr('action', '/inzeraty_a/' + ID);
                });
            });
        </script>

    </div>
@endsection