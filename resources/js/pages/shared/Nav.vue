<template>
    <nav class="my-auto">
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/settings"
                    :active="$page.component === 'Settings'"
                >
                    Settings
                </NavLink>
            </li>
            <li>
                <Link
                    href="/logout"
                    method="post"
                    as="button"
                    :data="{ name: 'ashraf' }"
                    class="text-black hover:underline"
                >
                    Logout
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLinks.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        NavLink,
        Link,
    },
};
</script>
