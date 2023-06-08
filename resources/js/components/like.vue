<template>
    <div class="">
        <!-- isActiveTrueがtrueかfalseでスタイルの切り替えをおこなっている -->
        <i
            v-on:click="storeOrDelete"
            class="[isActiveTrue === true ? 'fa-solid fa-heart' : 'fa-regular fa-heart']"
        ></i>
    </div>
</template>

<!-- 
    ・methodsオブジェクトの中に実行したい関数を定義していきます。
    ・data内で定義した値はthis.showTextのようにthisを使って参照していきます。
-->

<script>
    export default {
        // bladeから渡されたデータを受けとる
        props: ["productId", "likedData"],
        data() {
            return {
                isActiveTrue: this.likedData.includes(this.productId) ? false : true
            };
        }
        ,methods: {
            change() {
                // お気に入りの状態を切り替える
                this.isActiveTrue = !this.isActiveTrue;
            },
            storeProductId() {
                axios
                .post("storeLike/" + this.productId, {
                    productId: this.productId
                })
                .then(function () {
                    console.log("success");
                })
                .catch(function () {
                    console.log("error");
                });
            },
            deleteProductId() {
                axios
                .delete("deleteLike/" + this.productId, {
                    data: {
                        productId: this.productId
                    }
                })
                .then(function () {
                    console.log("success");
                })
                .catch(function () {
                    console.log("error");
                })
            },
            storeOrDelete() {
                const isTrue = this.likedData.includes(this.productId);
                if(isTrue === true) {
                    this.deleteProductId();
                    this.change();
                }else{
                    this.storeProductId();
                    this.change();
                }
            }
        }
    }
</script>




