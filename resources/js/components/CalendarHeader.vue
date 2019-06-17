<template>
  <div class="calendar-header">
    <div class="header-left">
      <slot name="header-left">
      </slot>
    </div>
    <div class="header-center">
      <span class="prev-month" v-on:click.stop="goPrev">{{ leftArrow }}</span>
      <span class="title">{{ getTitle(date) }}</span>
      <span class="next-month" v-on:click.stop="goNext">{{ rightArrow }}</span>
    </div>
    <div class="header-right">
      <slot name="header-right">
      </slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CalendarHeader',
  props: {
    value: Date,
    titleFormat: String
  },
  data() {
    return {
      leftArrow: "<",
      rightArrow: ">",
      date: Date
    }
  },
  created() {
    this.date = this.$props.value
  },
  methods: {
    getTitle(date) {
      return this.$moment(date).format(this.$props.titleFormat)
    },
    goPrev() {
      this.date = this.$moment(this.date).subtract(1, 'M').toDate()
      this.$emit('input', this.date)
    },
    goNext() {
      this.date = this.$moment(this.date).add(1, 'M').toDate()
      this.$emit('input', this.date)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .calendar-header {
    display: flex;
    align-items: center;

    .header-left, .header-right {
      flex: 1;
    }

    .header-center {
      flex: 3;
      text-align: center;

      .prev-month, .next-month {
        cursor: pointer;
      }

      .title {
        margin: 0 10px;
      }
    }
  }
</style>
