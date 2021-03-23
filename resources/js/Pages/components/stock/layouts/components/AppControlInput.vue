<template>
    <div class="w-full lg:w-6/12 px-4">
        <div  class="relative w-full mb-3">
            <label
                class="block uppercase text-gray-700 text-xs font-bold mb-2"
            >
                <slot></slot>
            </label>
            <input v-if="controlType ==='input'"
                   class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                   :class="{ 'border-2 border-red-500': error }"
                   v-bind="$attrs"
                   :value="modelValue"
                   @input="$emit('update:modelValue', $event.target.value)"
             />
            <select v-else-if="controlType === 'selection'"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                    :class="{ 'border-2 border-red-500': error }"
                    v-bind="$attrs"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
            >
                <option :value="s.id" v-for="s in selectOption" :key="s.id">
                    {{ s.company }}
                </option>
            </select>
            <select v-else-if="controlType === 'selectionCategory'"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                    :class="{ 'border-2 border-red-500': error }"
                    v-bind="$attrs"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
            >
                <option :value="s.id" v-for="s in selectOption" :key="s.id">
                    {{ s.category_name }}
                </option>
            </select>
            <textarea v-else-if="controlType === 'textarea'"
                      type="text"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                      :class="{ 'border-2 border-red-500': error }"
                      v-bind="$attrs"
                      :modelValue="value"
                      @update:modelValue="$emit('input', $event.target.value)"
                ></textarea>

            <input
                v-else-if="controlType === 'file'"
                v-bind="$attrs"
                type="file"
                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
            />
            <p
                v-if="error"
                class="p-2 text-red text-xs text-red-500 italic"
            >
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppControlInput",
    inheritAttrs: false,
    emits:['update:modelValue'],
    props: {
        modelValue: {
            type: String,
            required: false
        },
        controlType: {
            type: String,
            default: 'input'
        },
        error: {
            type: String,
            default: '',
            required:false
        },
        selectOption: {
            type: Object,
            required: false
        }
    }
}
</script>

<style scoped>

</style>
