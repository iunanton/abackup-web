<template>
  <div class="calendar-holder">
    <div class="calendar">
      <CalendarHeader v-model="firstDay"
        :titleFormat="titleFormat"/>
      <CalendarBody
        :firstDay="firstDay"
        :weekNames="weekNames">
        <template slot-scope="props">
          <slot :date="props.date">
          </slot>
        </template>
      </CalendarBody>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Calendar',
  props: {
    lang: String
  },
  data() {
    return {
      firstDay: this.$moment().startOf('month').toDate(),
      titleFormat: this.$props.lang == "zh" ? "YYYY年MM月" : "MMMM YYYY",
      weekNames: this.$props.lang == "zh" ? ['周日', '周一', '周二', '周三', '周四', '周五', '周六'] : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    }
  },
  components: {
    CalendarHeader: require('./CalendarHeader.vue').default,
    CalendarBody: require('./CalendarBody.vue').default
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.calendar-holder {
  display: block;
  overflow-x: auto;

  .calendar {
    display: block;
    width: 1068px;
  }
}
</style>
