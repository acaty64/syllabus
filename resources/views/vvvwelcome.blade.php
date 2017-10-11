<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('plugins\bootstrap\css\bootstrap.min.css') }}">
<script src="{{ url('js/vue.js') }}"></script>
        <title>SYLLABUS</title>
        <style>
            tr: {
                width: '50%'
            }
        </style>
    </head>
    <body>
        <div class="container">                
            <div id='app'>
                <div v-for="linea in lineas">
                    <linea-row :linea="linea"></linea-row>
                    <div v-if="linea.data">
                        <!--p>Tiene linea.data+'  '+@{{linea.data.tipo}}</p-->
                        <div v-if="linea.data.tipo == 'tabla2'">
                            <!--p>tabla2+'  '+@{{linea.data.info}}</p-->
                            <table class="table-striped col-md-12">
                                <tbody>
                                    <!--tr v-for="row2 in linea.data.info" is="table2-row" :row2="row2"-->
                                    <tr v-for="row2 in linea.data.info" :row2="row2">
                                        <td>@{{row2.wtitulo}}</td>
                                        <td>@{{row2.info}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else="linea.data.tipo == 'texto'">
                            <div v-for="info in linea.data.info">
                                @{{info.texto}}
                            </div>
                        </div>
                    </div>
                </div>
                <pre>@{{ $data }}</pre>
            </div>
        </div>
    </body>


    <template id="linea_row_tpl">
        <span v-if="linea.proceso == 'encabezado'">
            <h2>@{{linea.wtitulo}}</h2>
        </span>
        <span v-else-if="linea.proceso == 'titulo1'">
            <h4>@{{linea.wtitulo}}</h4>
        </span>
        <span v-else-if="linea.proceso == 'texto'">
            <span v-for="item in linea.data.info">
                @{{item.texto}}                
            </span>
        </span>
    </template>

    <template id='table2_row_tpl'>
        <td>@{{row2.wtitulo}}</td>
        <td>@{{row2.info}}</td>
    </template>


    <script type="text/javascript">
        Vue.component('linea-row', {
            template: "#linea_row_tpl",
            props: ['linea'],
        });

        Vue.component('table2-row', {
            template: "#table2_row_tpl",
            props: ['row2'],
        });

        
        new Vue({
            el: '#app',
            data: {
                row2: [],
                lineas: [
                    {
                        id: 0,
                        level: 0,
                        order: 0,
                        wtitulo: 'ADMINISTRACIÓN I',
                        proceso: 'encabezado'
                    },
                    {
                        id: 1,
                        level: 1,
                        order: 1,
                        wtitulo: 'GENERALIDADES',
                        proceso: 'titulo1',
                        data:   {
                            tipo: 'tabla2',
                            qrows: 3,
                            info: [
                                {
                                    id: 2,
                                    level: 2,
                                    order: 1.1,
                                    wtitulo: 'Asignatura',
                                    proceso: 'dato',
                                    info: 'ADMINISTRACIÓN I'
                                },
                                {
                                    id: 3,
                                    level: 2,
                                    order: 1.2,
                                    wtitulo: 'Pre-Requisito',
                                    proceso: 'dato',
                                    info: 'ICEA',
                                },
                                {
                                    id: 4,
                                    level: 2,
                                    order: 1.3,
                                    wtitulo: 'Créditos',
                                    proceso: 'dato',
                                    info: 3,
                                },
                            ],
                        },
                    },
                    {
                        id: 5,
                        level: 1,
                        order: 2,
                        wtitulo: 'SUMILLA',
                        proceso: 'titulo1',
                        data: {
                            tipo: 'texto',
                            qrows: 2,
                            info: [
                                {texto: 'Lorem ipsum dolor sit amet, magna mi inceptos quis auctor at, hymenaeos diam duis id magna. Ut laoreet, sed aliquet ac eu lorem adipiscing. Quam mattis conubia urna eu dui, sed nunc id dui nam, maecenas massa blandit bibendum vehicula congue arcu, ut magna ante elit congue vitae non, aliquet inceptos nunc. Varius optio justo ligula elementum tempus, orci hendrerit justo erat eget erat, morbi fermentum risus, arcu adipiscing velit vitae donec risus molestie. Non pretium erat, lobortis proin volutpat ipsum fermentum. Odio ullamcorper imperdiet porttitor duis.'},
                                {texto: 'Nibh enim, duis vulputate velit augue eget nonummy consectetuer. Urna nec eros urna erat aliquam elit, scelerisque mattis, nisl nunc elit id aptent. Risus porttitor egestas vestibulum, pede duis massa nulla fames, felis proin in ac adipiscing at vestibulum. Diam mauris id, pellentesque nec, cras habitasse massa vel nisl volutpat consequat. Metus nec. Libero morbi orci est eget a, vel quisque sit amet urna quisque ac, ut leo lorem maecenas nam amet, eu ultricies ut nec. A metus suscipit rutrum, in leo quis magna iaculis ac, massa arcu, lorem sed etiam wisi. Elementum quidem etiam vel donec euismod, vitae mi odio ut, lorem est ac imperdiet, molestie neque vehicula netus id, elit praesent. Sed erat nibh libero, tellus arcu erat quis, arcu vestibulum ultricies odio suspendisse luctus, eu rutrum orci sed. Congue scelerisque ut dictumst suspendisse ac.'},
                            ],
                        },
                    },
                    {
                        id: 6,
                        level: 1,
                        order: 3,
                        wtitulo: 'SISTEMA DE COMPETENCIAS',
                        proceso: 'titulo1'
                    },
                ],
            
            },

            methods: {
            },
            
        });
    </script>
    
</html>
