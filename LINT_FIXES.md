# WordPress Plugin Check - Lint Fixes

## Date: 2025-11-19

### ✅ Fixed Errors

1. **Text Domain Format Error in `NH-Related-Posts.php`**
   - **Status**: FIXED ✅
   - **Error**: The "Text Domain" header should only contain lowercase letters, numbers, and hyphens
   - **Fix**: Changed text domain from `NH-Related-Posts` to `nh-related-posts`
   - **File**: `NH-Related-Posts.php`, Line 11

2. **Text Domain Mismatch in `includes/post.php`**
   - **Status**: FIXED ✅
   - **Error**: Text domain must be lowercase only
   - **Fix**: Changed text domain from mixed case to `'nh-related-posts'`
   - **File**: `includes/post.php`, Line 34

### ℹ️ Informational Warnings

3. **Performance Warning for `post__not_in` Parameter**
   - **Status**: ACKNOWLEDGED (No action required)
   - **Warning**: Using exclusionary parameters like `post__not_in` should be used with caution
   - **Location**: `includes/post.php`, Line 24
   - **Notes**: This is a performance advisory. The current usage is acceptable for this plugin's purpose (excluding the current post from related posts). Alternative would be to use `post_parent__not_in` or custom SQL queries, but for a simple related posts feature with only 3 posts, the current implementation is fine.

## Summary

All **ERRORS** have been fixed. The plugin should now pass the WordPress Plugin Check with no errors. The remaining warning about `post__not_in` is informational and does not prevent plugin approval.
