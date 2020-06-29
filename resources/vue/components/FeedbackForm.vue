<template>
    <form action="/" @submit.prevent="submit" method="post" :class="{ 'submitted' : submitted }">
        <div class="form-front" >
        <span
            class="error inline bg-red-100 p-3 rounded"
            v-if="error.message"
        >
            {{error.message}}
        </span>
        <input
            v-model="name"
            id="name"
            name="name"
            placeholder="Name"
            type="text"
            required
            :class="{ 'error' : error.name }"
            :disabled="loading"
            @input="error.name=false"
        ><span class="error" v-if="error.name"> — {{error.name.join(', ')}}</span>
        <input
            v-model="email"
            id="email"
            name="email"
            placeholder="E-Mail"
            type="email"
            required
            :class="{ 'error' : error.email }"
            :disabled="loading"
            @input="error.email=false"
        ><span class="error" v-if="error.email"> — {{error.email.join(', ')}}</span>
        <textarea
            v-model="feedback"
            name="feedback"
            id="feedback"
            cols="30"
            rows="10"
            required
            :class="{ 'error' : error.feedback }"
            :disabled="loading"
            @input="error.feedback=false"
        ></textarea><span class="error" v-if="error.feedback"> — {{error.feedback.join(', ')}}</span>

        <button type="submit" :disabled="loading">Submit</button>

        <Loading v-if="loading" />
        </div>
        <div class="form-back">
            <div class="text-6xl pb-10">👍</div>
            <span class="text-4xl">Your voice will be heard!</span><br>
            <span class="text-2xl">Thanks for taking time to reach us.</span>
        </div>
    </form>
</template>

<script>
    import Loading from "./Loading";

    export default {
        data() {
            return {
                submitted: false,
                name: '',
                email: '',
                feedback: '',
                loading: false,
                error: {
                    name: false,
                    email: false,
                    feedback: false,
                    message: false
                }
            }
        },
        components: {
            Loading
        },
        methods: {
            submit() {
                this.loading = true

                axios
                    .post('/', {
                        name: this.name,
                        email: this.email,
                        feedback: this.feedback,
                    })
                    .then( response => {
                        console.log(response)
                        this.submitted = true
                    })
                    .catch( error => {
                        if (error.response) {

                            if( error.response.status === 500 ) {
                                this.error.message = 'Server Error 🤷 '
                            } else {
                                this.error = error.response.data.errors
                                this.error.message = error.response.data.message
                            }
                            console.log(error.response);

                        }
                        this.loading = false
                    })
            }
        },
    }
</script>

<style scoped lang="scss">

    form {
        position: relative;
    }
    .form-front, .form-back {
        transition: transform 0.7s cubic-bezier(.4,.2,.2,1);
        transform-origin: center;
    }
    .form-front {
        transform: scale(1);
    }
    .form-back {
        @apply absolute inset-0 bg-white ;
        text-align: center;
        padding-top: 10%;
        transform: scale(0);
    }
    .submitted {
        .form-front {
            transform: scale(0);
        }
        .form-back {
            transform: scale(1);
        }
    }

    input, textarea {
        @apply relative outline-none border border-gray-400 rounded py-4 px-3 w-full bg-white text-base text-gray-700 mb-3;
    }
    input:focus, textarea:focus  {
        @apply outline-none shadow-outline;
    }
    input.error, textarea.error {
        @apply border border-red-500;
    }
    button {
        @apply bg-blue-500 text-white px-4 py-2 rounded select-none;
    }
    button:hover {
        @apply bg-blue-600;
    }
    input:disabled, textarea:disabled, button:disabled {
        @apply cursor-not-allowed ;
    }
    span.error {
        @apply text-red-600 mb-4 block pl-2;
    }
</style>
