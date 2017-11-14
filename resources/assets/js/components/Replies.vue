<template>
    <div>
        <div v-for="(reply, index) in replies">
            <reply :data="reply" @deleted="remove(index)"></reply>
        </div>

        <new-reply :endpoint="endpoint" @created="add"></new-reply>
    </div>
</template>

<script>
    import Reply from './Reply.vue';
    import NewReply from './NewReply.vue';

    export default {
        props: ['data'],

        components: { Reply, NewReply },

        data() {
            return {
                replies: this.data,
                endpoint: location.pathname + '/replies'
            }
        },

        methods: {
            add(reply) {
                this.replies.push(reply);
                this.$emit('added');
            },

            remove(index) {
                this.replies.splice(index, 1);

                this.$emit('removed');

                flash('Your reply has been deleted.');
            }
        }
    }
</script>