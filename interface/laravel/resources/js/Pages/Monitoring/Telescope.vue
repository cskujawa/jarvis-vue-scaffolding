<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>


<template>
    <AppLayout title="Telescope">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-lg sm:rounded-lg">
                    <iframe name="telescope_dashboard" src="http://192.168.0.127:8000/telescope" id="telescope_dashboard" sandbox="allow-forms allow-popups allow-same-origin allow-scripts" width=100% height=800 class="sm:rounded-lg shadow-lg"></iframe>
                </div>
            </div>
        </div>
    </AppLayout>
</template>