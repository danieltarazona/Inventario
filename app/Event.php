<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event implements \MaddHatter\LaravelFullcalendar\Event
{

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function order_id()
  {
    return $this->order->id;
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function product_id()
  {
    return $this->product->id;
  }



    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}
