<template>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TJRJ - Livros</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    </head>
    <body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white col-md-1" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">TJRJ - Livros</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#/dashboard">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#/livros">Livros</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#/autor">Autor</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#/assunto">Assunto</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#/home">Home</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="mt-4">CRUD Assunto
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                            <br/>
                            <div class="card-body">
                                <form @submit.prevent="save">
                                    <div class="row mb-1">
                                        <label for="descricao" class="col-sm-2 col-form-label">Descrição <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="assunto.descricao" class="form-control" aria-label="Descrição" placeholder="Descrição">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Lista Assunto</h2>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="assunto in result" v-bind:key="assunto.id">

                                    <td>{{ assunto.descricao }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" @click="editarAssunto(assunto)">Editar</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger"  @click="deletarAssunto(assunto)">Deletar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
</template>

<script>
import axios from 'axios';
import Swal from "sweetalert2";

export default {
    name: 'Assunto',
    data() {
        return {
            result: {},
            assunto: {
                id: '',
                descricao: ''
            }
        }
    },
    created() {
        this.AssuntoLoad();
    },
    mounted() {
    },
    methods: {
        AssuntoLoad() {
            var url = "http://127.0.0.1:8000/api/assunto";
            axios.get(url)
                .then(
                    ({data}) => {
                        this.result = data;
                    }
                );
        },
        save() {
            if(this.assunto.id == '') {
                this.saveData();
            } else {
                this.updateData();
            }
        },
        saveData() {
            this.validacaoObg();

            axios.post("http://127.0.0.1:8000/api/assunto", this.assunto)
                .then(
                    ({data})=>{
                        Swal.fire({
                            title: "Salvo com Sucesso!",
                            icon: "success"
                        });
                        this.AssuntoLoad();
                    }
                )

        },
        editarAssunto(assunto)
        {
            this.assunto = assunto;
        },
        updateData()
        {
            this.validacaoObg();

            var urlEditar = 'http://127.0.0.1:8000/api/assunto/'+ this.assunto.id;
            axios.put(urlEditar, this.assunto)
                .then(
                    ({data})=>{
                        Swal.fire({
                            title: "Alterado com Sucesso!",
                            icon: "success"
                        });
                        this.AssuntoLoad();
                    }
                );

        },
        deletarAssunto(assunto){
            var url = `http://127.0.0.1:8000/api/assunto/${assunto.id}`;
            axios.delete(url);
            Swal.fire({
                title: "Deletado com Sucesso!",
                icon: "success"
            });
            this.AssuntoLoad();
        },
        validacaoObg(){
            if (!this.assunto.descricao) {
                Swal.fire({
                    title: "Preencha o campo Obrigátorio!",
                    icon: "error"
                });
            }
        }
    }
}
</script>
