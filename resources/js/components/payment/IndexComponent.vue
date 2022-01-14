<template>
    <div>
        <div class="form-group table-responsive">
            <table class="table text-center table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>เลขบัญชี</th>
                        <th>จำนวนเงิน</th>
                        <th>เพิ่ม/ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(input,k) in inputs" :key="k">
                        <td>
                            {{ k+1 }}
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bankNo[]" id="bankNo" v-model="input.bankNo" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="amount[]" id="amount" v-model="input.amount" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" @click="add(k)" v-show="k == inputs.length-1">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            inputs: [
                {
                    bankNo: '',
                    amount: '',
                }
            ],
        };
    },
    methods: {
        add(index) {
            this.inputs.push({ bankNo: '', amount: ''  });
        },
        remove(index) {
            this.inputs.splice(index, 1);
        }
    },
    mounted() {
        this.monthList = this.monthGlobal
        console.log(this.monthList);
    },
}
</script>