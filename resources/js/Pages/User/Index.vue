<template>
    <Layout title="User Page">
        <div>
            <h2>User Page</h2>
            <Link :href="route('user.create')" as="button">Create User</Link>
            <br />
            {{ userCount }} User <br /><br />
            <div style="font-size: medium; color: red">
                {{ $page.props.flash.message }}
            </div>
            <table border="1" cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users">
                        <td>{{ index + 1 }}</td>
                        <td>{{ user.name }}</td>
                        <td>
                            <Link
                                as="button"
                                :href="route('user.show', user.id)"
                                >Detail</Link
                            >
                            <Link
                                as="button"
                                :href="route('user.edit', user.id)"
                                style="margin-left: 5px"
                                >Edit</Link
                            >
                            <Link
                                as="button"
                                href=""
                                @click.prevent="deleteUser(user.id)"
                                style="margin-left: 5px"
                                >Delete</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
defineProps({
    users: Array,
});

const page = usePage();
const userCount = computed(() => {
    return page.props.users.length;
});
const form = useForm({});
function deleteUser(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    })
        .then((result) => {
            if (result.isConfirmed) {
                form.delete(`/user/${id}`, {
                    preserveScroll: false,
                    onSuccess: () => {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your data has been deleted.",
                            icon: "success",
                        });
                    },
                    onError: (errors) => {
                        console.log(errors);
                    },
                });
            }
        })
        .catch((e) => {
            console.log(e);
        });
}
</script>
