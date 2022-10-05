<template>
    <div>
        <!-- directive -->
        <div class="images">
            <img
                v-for="src in compain.images"
                :key="src"
                :src="GenerateURL + '/' + src"
            /><br />
        </div>
    </div>
</template>

<script setup>
import useCompains from "../../composables/compains";
import { defineProps, onMounted, toRefs } from "vue";
const props = defineProps({
    id: {
        required: true,
        type: String,
    },
});

const { id } = toRefs(props);

const { errors, compain, getCompain } = useCompains();
onMounted(() => {
    getCompain(id.value);
});
const GenerateURL = window.location.origin;
</script>
