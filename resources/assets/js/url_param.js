
/**
 * Get the value of a specified URL parameter.
 *
 * @param param The name of the parameter to get.
 * @return The value of the specified URL parameter.
 */
export function getURLParam(param)
{
    return new URL(window.location.href).searchParams.get(param);
}
