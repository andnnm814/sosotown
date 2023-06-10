<template>
    <div class="heart">
        <!-- isActiveTrueがtrueかfalseでスタイルの切り替えをおこなっている -->
        <i
            v-on:click="storeProductId()"
            :class="[isActiveTrue === true ? 'fa-solid fa-heart fa-2x' : 'fa-regular fa-heart fa-2x']"
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
        props: ["productId", "likedData", "userId"],
        data() {
            return {
                isActiveTrue: this.likedData.includes(this.productId) ? true : false
            };
        }
        ,methods: {
            change() {
                // お気に入りの状態を切り替える
                this.isActiveTrue = !this.isActiveTrue;
            },
            storeProductId() {
                axios
                .post("/api/storeLike/", {
                    productId: this.productId,
                    userId: this.userId
                })
                .then(() => {
                    console.log("success");
                    this.change();
                })
                .catch(() => {
                    console.log("error");
                });
            }
            // deleteProductId() {
            //     axios
            //     .delete("/api/deleteLike/", {
            //         productId: this.productId
            //     })
            //     .then(function () {
            //         console.log("success");
            //     })
            //     .catch(function () {
            //         console.log("error");
            //     })
            // },
            // storeOrDelete() {
            //     const isTrue = this.likedData.includes(this.productId);
            //     if(isTrue === true) {
            //         this.deleteProductId();
            //         this.change();
            //     }else{
            //         this.storeProductId();
            //         this.change();
            //     }
            // }
        }
    }
</script>




