
/**
 *
 */
export function getURLParam(param)
{
    return new URL(window.location.href).searchParams.get(param);
}
