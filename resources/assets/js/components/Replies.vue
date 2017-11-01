<template>
    <div>
        <div v-for="(reply, index) in replies">
            <reply :data="reply" @deleted="remove(index)"></reply>
        </div>
    </div>
</template>

<script>
    import Reply from './Reply.vue';

    export default {
        props: ['data'],

        components: { Reply },

        data() {
            return {
                replies: this.data
            }
        },

        methods: {
            remove(index) {
                this.replies.splice(index, 1);

                this.$emit('removed');

                flash('Your reply has been deleted.');
            }
        }
    }
</script>