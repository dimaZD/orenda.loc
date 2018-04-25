<template>
    <ul class="nav nav-pills nav-stacked">
        <router-link to="/admin" tag="li" active-class="active" exact>
            <a><i class="fa fa-list-alt fa-fw"></i>Кабінет</a>
        </router-link>
        <router-link to="admin/flats/create" tag="li" active-class="active" exact>
            <a><i class="fa fa-file-o fa-fw"></i>Додати квартиру</a>
        </router-link>
        <router-link to="admin/user" tag="li" active-class="active" exact>
            <a><i class="fa fa-pencil fa-fw"></i>Редагуати дані користуввача</a>
        </router-link>
    </ul>
</template>

<script>
    export default {
        props: [],
        components: {},
        computed: {},
        methods: {}
    };
</script>