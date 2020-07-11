<template>
    <div>
        @{{ message }}
        <router-link to="/home/example"><a>url to example</a></router-link>
    </div>

</template>
<script>
    export default {
        data () {
            return {
                message: 'This is the home component!'
            };
        }
    };
</script>
