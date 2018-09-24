&lt;?php
defined(&#39;BASEPATH&#39;) OR exit(&#39;No direct script access allowed&#39;);
class Login_m extends CI_Model
{
function logged_id()
{
return $this-&gt;session-&gt;userdata(&#39;user_id&#39;);
}
function check_login($table, $field1, $field2)
{
$this-&gt;db-&gt;select(&#39;*&#39;);
$this-&gt;db-&gt;from($table);
$this-&gt;db-&gt;where($field1);
$this-&gt;db-&gt;where($field2);
$this-&gt;db-&gt;limit(1);
$query = $this-&gt;db-&gt;get();
if ($query-&gt;num_rows() == 0) {
return FALSE;
} else {
return $query-&gt;result();
}
}
}