<?php

namespace App;

abstract class Status extends Enum
{
    const draft = "Draft";
    const pending = "Pending";
    const processing = "Processing";
    const approved = "Approved";
    const denied = "Denied";
    const queued = "Queued";
    const synced = "Synced";
    const active = "Active";
    const inactive = "Inactive";
    const archived = "Archived";
}
