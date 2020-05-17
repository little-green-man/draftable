# Draftable

Draftable - A library to quickly support users drafting content for your Laravel models.

## What is it?

This library allows you  to quickly and easily store draft content for any model, for multiple users.

## Features

* Indicates when a model has since been updated
* Fast model update with $draft->commit()

# Usage

Require the library
Configure e.g. user model

Create a draftable model
use draftable
$protected draftableComparisons = []; // Always looks at updated_at, uses these to what has changed.

Save draft content (when they press save as draft, or automatically e.g. with Livewire. Set lazy updates appropriately)
Commit draft content (auto destroys, checking for commit first)
Delete draft.


Indicate if there is a draft.
Indicate if the model has since changed
    (draft keeps a note of updated_at),
    and optionally what has changed (stores specific attributes)

Clear all drafts for a user.
Clear all drafts for a model.
Clear all drafts for a model class.
Clear all drafts.

# Config
User model