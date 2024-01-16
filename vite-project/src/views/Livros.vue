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
                            <h1 class="mt-4">CRUD Livros
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
                                        <label for="titulo" class="col-sm-2 col-form-label">Titulo <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="livros.titulo" class="form-control" aria-label="Titulo" placeholder="Titulo">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="editora" class="col-sm-2 col-form-label">Editora <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="livros.editora" class="form-control" aria-label="Editora" placeholder="Editora">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="edicao" class="col-sm-2 col-form-label">Edição <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="livros.edicao" class="form-control" aria-label="Edição" placeholder="Edição">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="anopublicacao" class="col-sm-2 col-form-label">Ano Publicação <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="livros.anopublicacao" class="form-control" aria-label="Ano Publicação" placeholder="Ano Publicação">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="valor" class="col-sm-2 col-form-label">Valor <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="livros.valor" class="form-control" aria-label="Valor" placeholder="Valor">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="assunto" class="col-sm-2 col-form-label">Assunto <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-select" v-model="livros.assunto">
                                                <option selected>Selecione</option>
                                                <option v-for="livros in assunto" :value="livros.id">
                                                    {{ livros.descricao }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="autor" class="col-sm-2 col-form-label">Autor <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-select" v-model="livros.autor">>
                                                <option selected>Selecione</option>
                                                <option v-for="livros in autor" :value="livros.id">
                                                    {{ livros.nome }}
                                                </option>
                                            </select>
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
                            <h2>Lista Livros</h2>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Editora</th>
                                    <th scope="col">Edição</th>
                                    <th scope="col">Ano Publicação</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="livros in result" v-bind:key="livros.id">

                                    <td>{{ livros.titulo }}</td>
                                    <td>{{ livros.editora }}</td>
                                    <td>{{ livros.edicao }}</td>
                                    <td>{{ livros.anopublicacao }}</td>
                                    <td>{{ livros.valor }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" @click="editarLivros(livros)">Editar</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger"  @click="deletarLivros(livros)">Deletar</button>
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
    name: 'Livros',
    data() {
        return {
            result: {},
            livros: {
                id: '',
                titulo: '',
                editora: '',
                edicao: '',
                anopublicacao: '',
                assunto: '',
                autor: ''
            },
            assunto: {},
            autor: {}
        }
    },
    created() {
        this.LivrosLoad();
    },
    mounted() {
        this.carregaAssunto();
        this.carregaAutor();
    },
    methods: {
        LivrosLoad() {
            var url = "http://127.0.0.1:8000/api/livros";
            axios.get(url)
                .then(
                    ({data}) => {
                        this.result = data;
                    }
                );
        },
        carregaAssunto() {
            var url = "http://127.0.0.1:8000/api/assunto";
            axios.get(url)
                .then(response => {
                    this.assunto = response.data;
                });
        },
        carregaAutor() {
            var url = "http://127.0.0.1:8000/api/autor";
            axios.get(url)
                .then(response => {
                    this.autor = response.data;
                });
        },
        save() {
            if(this.livros.id == '') {
                this.saveData();
            } else {
                this.updateData();
            }
        },
        saveData() {
            this.validacaoObg();

            axios.post("http://127.0.0.1:8000/api/livros", this.livros)
                .then(
                    ({data})=>{
                        Swal.fire({
                            title: "Salvo com Sucesso!",
                            icon: "success"
                        });
                        this.LivrosLoad();
                    }
                )
                .catch(err => {
                        Swal.fire({
                            title: err,
                            icon: "error"
                        });
                    }
                )

        },
        editarLivros(livros)
        {
            this.livros = livros;
        },
        updateData()
        {
            this.validacaoObg();

            var editrecords = 'http://127.0.0.1:8000/api/livros/'+ this.livros.id;
            axios.put(editrecords, this.livros)
                .then(
                    ({data})=>{
                        Swal.fire({
                            title: "Alterado com Sucesso!",
                            icon: "success"
                        });
                        this.LivrosLoad();
                    }
                );

        },
        deletarLivros(livros){
            var url = `http://127.0.0.1:8000/api/livros/${livros.id}`;
            axios.delete(url);
            Swal.fire({
                title: "Deletado com Sucesso!",
                icon: "success"
            });
            this.LivrosLoad();
        },
        validacaoObg(){
            if (!this.livros.titulo || !this.livros.editora || !this.livros.edicao || !this.livros.anopublicacao || !this.livros.valor) {
                Swal.fire({
                    title: "Preencha todos os campos Obrigátorios!",
                    icon: "error"
                });
            }
        }
    }
}
</script>
