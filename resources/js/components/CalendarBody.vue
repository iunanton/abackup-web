<template>
  <div class="calendar-body">
    <div class="weeks">
      <strong class="week" v-for="week in weekNames">
        {{ week }}
      </strong>
    </div>
    <div class="dates" ref="dates">
      <div class="dates-bg">
        <div class="week-row" v-for="week in currentDates">
          <div class="day-cell" v-for="day in week"
            :class="{'today': day.isToday,
              'not-cur-month': !day.isCurMonth}">
            <p class="day-number">{{ day.monthDay }}</p>
            <p v-if="day.isCurMonth">
              <slot :date="day.date">
              </slot>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CalendarBody',
  props: {
    firstDay: Date,
    weekNames: Array
  },
  computed: {
    currentDates() {
      return this.getCalendar()
    }
  },
  methods: {
    getCalendar() {
      let startDate = this.$moment(this.$props.firstDay).startOf('week')
      let today = this.$moment(new Date()).startOf('day')

      let calendar = []

      for (let perWeek = 0; perWeek < 6; perWeek++) {
        let week = []

        for (let perDay = 0; perDay < 7; perDay++) {
          week.push({
            monthDay: this.$moment(startDate).format('D'),
            isToday: this.$moment(startDate).format('YYYY M D') == this.$moment(today).format('YYYY M D'),
            isCurMonth: this.$moment(startDate).format('M') == this.$moment(this.$props.firstDay).format('M'),
            date: startDate
          });

          startDate = this.$moment(startDate).add(1, 'd')
        }

        calendar.push(week)
      }

      return calendar
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .calendar-body {
    margin-top: 20px;

    .weeks {
      display: flex;
      border-top: 1px solid #e0e0e0;
      border-bottom: 1px solid #e0e0e0;
      border-left: 1px solid #e0e0e0;

      .week {
        flex: 1;
        text-align: center;
        border-right: 1px solid #e0e0e0;
      }
    }

    .dates {
      position: relative;

      .week-row {
        border-left: 1px solid #e0e0e0;
        display: flex;

        .day-cell {
          flex: 1;
          min-height: 100px;
          padding: 4 px;
          border-right: 1px solid #e0e0e0;
          border-bottom: 1px solid #e0e0e0;

          p {
            margin: 0;
            padding: 4px 5px 4px 4px;
          }

          .day-number {
            text-align: right;
            margin: 0;
            padding: 4px 5px 4px 4px;
            font-size: 14px;
          }
          &.today{
            background-color: #fcf8e3;
          }
          &.not-cur-month {
            color: rgba(0, 0, 0, 0.24);
            background-color: #f7f7f7;
          }
        }
      }
    }
  }
</style>
