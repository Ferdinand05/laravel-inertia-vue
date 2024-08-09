<template>
    <Layout title="Create User">
        <h3 class="text-3xl my-5">Update User</h3>

        <form
            @submit.prevent="updateUser()"
            method="post"
            enctype="multipart/form-data"
        >
            <label for="name">Name : </label><br />
            <input
                type="text"
                name="name"
                id="name"
                v-model="form.name"
                autocomplete="off"
                size="50"
            />
            <div class="error">
                {{ form.errors.name }}
            </div>
            <br />
            <label for="email">Email : </label><br />
            <input
                type="text"
                name="email"
                id="email"
                v-model="form.email"
                autocomplete="off"
                size="50"
            />
            <div class="error">
                {{ form.errors.email }}
            </div>
            <br />
            <img class="userImage" :src="imageUrl + oldAvatar" alt="" />
            <br />
            <label for="avatar">Avatar : </label><br />
            <input
                type="file"
                name="avatar"
                id="avatar"
                @input="form.avatar = $event.target.files[0]"
            />

            <div class="error">
                {{ form.errors.avatar }}
            </div>
            <br />
            <button
                type="submit"
                :disabled="form.processing"
                class="bg-green-500 px-3 py-1 rounded-md"
            >
                Submit
            </button>
        </form>
        <br />

        <Link href="/user" class="text-blue-600 underline">Back</Link>
    </Layout>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const page = usePage();
const imageUrl = "/storage/avatar/";

const form = useForm({
    email: page.props.user.email,
    name: page.props.user.name,
    id: page.props.user.id,
    avatar: page.props.user.avatar,
    _method: "put",
});

const oldAvatar = form.avatar;
function updateUser() {
    Swal.fire({
        title: "Are you sure?",
        text: "You will update this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Update !",
    })
        .then((result) => {
            if (result.isConfirmed) {
                form.post(`/user/${form.id}`, {
                    forceFormData: true,
                    preserveScroll: true,
                    onSuccess: () => {
                        Swal.fire({
                            title: "Updated!",
                            text: "Your data has been updated.",
                            icon: "success",
                        });
                    },
                    onError: (errors) => {
                        console.log(errors);
                        form.reset();
                    },
                });
            }
        })
        .catch((e) => {
            console.log(e);
        });
}
</script>

<style scoped>
.userImage {
    width: 120px;
    border-radius: 5px;
    border: 2px solid lightgray;
}
</style>
