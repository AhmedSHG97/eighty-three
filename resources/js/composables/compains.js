import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCompains() {
    const compains = ref([]);
    const compain = ref([])
    const router = useRouter()
    const errors = ref('')
    const getCompains = async () => {
        let response = await axios.get("/api/compains");
        compains.value = response.data.status ? response.data.data : [];
    };
    const destroyCompain = async (id) => {
        await axios.delete("/api/compains/" + id);
    };
    const getCompain = async (id) => {
        let response = await axios.get("/api/compains/" + id);
        compain.value = response.data.data;
    };

    const storeCompain = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/compains", data,{
                    'content-type': 'multipart/form-data',
                    'Accept': 'application/json',
                });
            await router.push({ name: "compains.index" });
        } catch (e) {
            if (e.response.status === 422 || e.response.status === 400) {
                errors.value = e.response.data.message;
            }
        }
    };

    const updateCompain = async (id,data) => {
        data.append("_method", "put")
        console.log("updateCpmoains",data.get("name"));
        errors.value = "";
        try {
            await axios.post("/api/compains/" + id, data,{
                'content-type': 'multipart/form-data',
                'Accept': 'application/json',
            });
            await router.push({ name: "compains.index" });
        } catch (e) {
            if (e.response.status === 422 || e.response.status === 400) {
                errors.value = e.response.data.message;
            }
        }
    };
    return {
        compains,
        compain,
        errors,
        getCompains,
        destroyCompain,
        getCompain,
        storeCompain,
        updateCompain,
    };
}
