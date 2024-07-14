<script setup>
import { useForm } from "@inertiajs/vue3";
import InputGroup from "@/Components/InputGroup.vue";
import SelectGroup from "@/Components/SelectGroup.vue";
import {ref} from "vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import AceptarButton from "@/Components/AceptarButton.vue";

const props = defineProps({
    Comunidades: {type: Object},
    Colonia: {type: Object},
    flash: {type: Object}
})

const form = useForm({
    id:0,
    colonia1_id:0, colonia1:'', colonia_id:0, colonia:'',
    comunidad_id:0, comunidad:'', tipocomunidad_id:0, tipocomunidad:''
 });


const msj = ref('');
const classMsj = ref('hidden');

// console.log(props.Colonia);

if (props.Colonia !== 'undefined' && props.Colonia != null){
    form.id = props.Colonia.id;
    form.colonia1_id = props.Colonia.colonia1_id;
    form.colonia1 = props.Colonia.colonia1;
    form.colonia_id = props.Colonia.colonia_id;
    form.colonia = props.Colonia.colonia;
    form.comunidad_id = props.Colonia.comunidad_id;
    form.comunidad = props.Colonia.comunidad;
    form.tipocomunidad_id = props.Colonia.tipocomunidad_id;
    form.tipocomunidad = props.Colonia.tipocomunidad;

}


const title_form = ref(
    (props.Colonia == null) ? 'Nueva Colonia' : 'Editando la Colonia',
);


const guardarColonia = () =>{
    if (props.Colonia == null){
        form.post(route('colonia.save'), {
            onSuccess : () => {
                ok(props.flash.success);
            },
            onError: (response) => {
                console.log(response);
                form.errors = response;
            }
        });
    }else{
        form.post(route('colonia.update'), {
            onSuccess : (response) => {
                ok(response.props.flash.success);
            },
            onError: (errors) => {
                form.errors = errors;
            }
        });

    }
}

const comboComunidades = (e) => {
    if(e.target.options.selectedIndex > -1) {
        form.comunidad_id = e.target.value;
        form.comunidad = e.target.options[e.target.options.selectedIndex].text;
        console.log(form.comunidad_id+'_'+form.comunidad);
    }
};



const ok = (m) =>{
    form.reset();
    msj.value=m;
    classMsj.value = 'block';
    setTimeout(()=>{
        classMsj.value = 'hidden'
        msj.value='';
    },4800);
}


console.log(props.Colonia);




</script>

<template>
            <AlertSuccess :class-msg="classMsj" :msg="msj">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                </svg>
            </AlertSuccess>

        <div class="grid gap-6 bg-white mb-8 md:grid-cols-2 border rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <form class="form-horizontal" @submit.prevent="guardarColonia" enctype="multipart/form-data">
                <InputGroup v-model.number="form.colonia_id" :placeholder="'Colonia_ID'" :errors="form.errors.colonia_id" :classEspecial="'em9'" type="number" :class-especial="'em15 bg-yellow-50 border-gray-700'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                    </svg>
                </InputGroup>
                <InputGroup v-model="form.colonia" :errors="form.errors.colonia" :placeholder="'Colonia'" :type="'text'" :class-especial="'bg-yellow-50'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>
                </InputGroup>
                <SelectGroup
                    :opciones="props.Comunidades"
                    v-model="form.comunidad_id"
                    @change="comboComunidades($event)"
                    :errors="form.errors.comunidad_id"
                    :class-especial="'em15 bg-yellow-50'"
                />
                <input type="hidden" v-model="form.id" value="{{form.id}}" >
                <AceptarButton class="mt-4 float-right " >
                    Guardar
                </AceptarButton>
                </form>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
            </div>
        </div>

</template>
