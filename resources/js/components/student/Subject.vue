<template>
    <div>
        <data-table
            :columns="columns"
            url="http://istep.local/api/subject_getall">
        </data-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            columns: [
                {
                    label: 'ID',
                    name: 'id',
                    orderable: true,
                },
                {
                    label: 'Status',
                    name: 'status',
                    orderable: true,
                },
            ]
        }
    },
}
</script>