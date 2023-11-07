<template>
    <div>
        <nav class="mt-4">
            <ul class="list-disc">
                <li>
                    <Link
                        href="/"
                        class="text-blue-500 hover:underline"
                        :class="{
                            'font-bold underline': $page.component === 'Home',
                        }"
                        >Home</Link
                    >
                </li>
                <li>
                    <Link
                        href="/users"
                        class="text-blue-500 hover:underline"
                        :class="{
                            'font-bold underline': $page.component === 'Users',
                        }"
                    >
                        Users
                    </Link>
                </li>
                <li>
                    <Link
                        href="/settings"
                        class="text-blue-500 hover:underline"
                        :class="{
                            'font-bold underline':
                                $page.component === 'Settings',
                        }"
                    >
                        Settings
                    </Link>
                </li>
                <li>
                    <Link
                        href="/logout"
                        method="post"
                        as="button"
                        :data="{ name: 'ashraf' }"
                        class="text-blue-500 hover:underline"
                    >
                        Logout
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        Link,
    },
};
</script>
