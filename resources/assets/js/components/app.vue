<template>
    <div>
        <slot></slot>
        <div class="container-fluid">
            <div class="row pad_top">
                <div class="col-md-2">
                    <app-sidebar></app-sidebar>
                </div>
                <div class="col-md-10" role="main">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import appSidebar from './parts/sidebar'

    export default {
        props: [],
        components: {
            appSidebar,
        },
        computed: {},
        methods: {}
    };
</script>